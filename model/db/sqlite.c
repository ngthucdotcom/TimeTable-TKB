/*
   +----------------------------------------------------------------------+
   | Authors: Chris Burton   <chris@max-hosting.net>                      |
   | Patches: Sebastiano Suraci                                           |
   |                                                                      |
   +----------------------------------------------------------------------+
 */

#ifdef HAVE_CONFIG_H
#include "config.h"
#endif

#include "php.h"
#include "php_ini.h"
#include "php_sqlite.h"
#include "php_globals.h"
#include "ext/standard/info.h"
#include "ext/standard/php_string.h"
#include "Zend/zend_modules.h"

ZEND_FUNCTION(sqlite_open);
ZEND_FUNCTION(sqlite_close);
ZEND_FUNCTION(sqlite_version);
ZEND_FUNCTION(sqlite_encoding);
ZEND_FUNCTION(sqlite_exec);
ZEND_FUNCTION(sqlite_last_insert_rowid);
ZEND_FUNCTION(sqlite_complete);
ZEND_FUNCTION(sqlite_fetch_array);
ZEND_FUNCTION(sqlite_fetch_field_array);
ZEND_FUNCTION(sqlite_changes);

ZEND_DECLARE_MODULE_GLOBALS(sqlite)

#define le_sqlite_name "SQLite Database"
#define le_sqlite_result_name "SQLite Result set"

function_entry sqlite_functions[] = {
	ZEND_FE(sqlite_open, NULL)
	ZEND_FE(sqlite_close, NULL)
	ZEND_FE(sqlite_version, NULL)
	ZEND_FE(sqlite_encoding, NULL)
	ZEND_FE(sqlite_exec, NULL)
	ZEND_FE(sqlite_last_insert_rowid, NULL)
	ZEND_FE(sqlite_complete, NULL)
	ZEND_FE(sqlite_fetch_array, NULL)
	ZEND_FE(sqlite_fetch_field_array, NULL)
	ZEND_FE(sqlite_changes, NULL)
	{NULL, NULL, NULL}
};

zend_module_entry sqlite_module_entry = {
	STANDARD_MODULE_HEADER,
	"sqlite",
	sqlite_functions,
	ZEND_MODULE_STARTUP_N(sqlite),
	ZEND_MODULE_SHUTDOWN_N(sqlite),
	ZEND_MODULE_ACTIVATE_N(sqlite),		
	ZEND_MODULE_DEACTIVATE_N(sqlite),
	ZEND_MODULE_INFO_N(sqlite),
	NO_VERSION_YET,
	STANDARD_MODULE_PROPERTIES
};

#ifdef COMPILE_DL_SQLITE
ZEND_GET_MODULE(sqlite)
#endif

static void php_sqlite_free_le(zend_rsrc_list_entry *rsrc TSRMLS_DC)
{
	sqlite_resource *r = (sqlite_resource*)rsrc->ptr;
	
	if(r->open)
	{
		sqlite_close(r->db);
	}
	
	free(r);
}

static void php_sqlite_free_le_result(zend_rsrc_list_entry *rsrc TSRMLS_DC)
{
	sqlite_result *r = (sqlite_result*)rsrc->ptr;
	
	sqlite_free_table(r->result);
	
	free(r);
}

ZEND_MODULE_STARTUP_D(sqlite)
{
	SQLITE_G(le_sqlite) = zend_register_list_destructors_ex(php_sqlite_free_le, NULL, le_sqlite_name, module_number);
	
	SQLITE_G(le_sqlite_result) = zend_register_list_destructors_ex(php_sqlite_free_le_result, NULL, le_sqlite_result_name, module_number);
	
	return SUCCESS;
}

ZEND_MODULE_SHUTDOWN_D(sqlite)
{
 /* Remove comments if you have entries in php.ini
	UNREGISTER_INI_ENTRIES();
 */
	return SUCCESS;
}

/* Remove if there's nothing to do at request start */
ZEND_MODULE_ACTIVATE_D(sqlite)
{
	return SUCCESS;
}

/* Remove if there's nothing to do at request end */
ZEND_MODULE_DEACTIVATE_D(sqlite)
{
	return SUCCESS;
}

ZEND_MODULE_INFO_D(sqlite)
{
	php_info_print_table_start();
	php_info_print_table_header(2, "SQLite support", "enabled");
	php_info_print_table_row(2, "SQLite PHP Module", sqlite_php_version);
	php_info_print_table_row(2, "SQLite Library", sqlite_version);
	php_info_print_table_row(2, "SQLite Encoding", sqlite_encoding);
	php_info_print_table_end();
}

/* {{{ proto void sqlite_close(int sqlite_identifier)
       Closes an SQLite database */
ZEND_FUNCTION(sqlite_close)
{
	int sqlite_id;
	int sqlite_type;
	sqlite_resource *res;

	if (zend_parse_parameters(ZEND_NUM_ARGS() TSRMLS_CC, "l", &sqlite_id) == FAILURE) {
		return;
	}

	res = (sqlite_resource*) zend_list_find(sqlite_id, &sqlite_type);

	if(sqlite_type != SQLITE_G(le_sqlite))
		RETURN_FALSE;

	if(res->open) {
		sqlite_close(res->db);
		res->open = 0;
	}
 
	if (zend_list_delete(sqlite_id) == SUCCESS) {
		RETURN_TRUE;
	} else {
		RETURN_FALSE;
	}
}
/* }}} */

/* {{{ proto int sqlite_open(string filename, int perms)
   Open an SQLite database */
ZEND_FUNCTION(sqlite_open)
{
	int perm = 0666;
	char *filename;
	int filenameLength;
	char *err;
	int ret;
	sqlite_resource *r;

        if (ZEND_NUM_ARGS() < 1 || ZEND_NUM_ARGS() > 2)
        {
                WRONG_PARAM_COUNT;
        }

	if (zend_parse_parameters(ZEND_NUM_ARGS() TSRMLS_CC,
			"s|l", &filename, &filenameLength, &perm) == FAILURE) {
		return;
	}


	r = (sqlite_resource*)malloc(sizeof(sqlite_resource));

	if ((r->db = sqlite_open(filename, perm, &err)) == NULL)
	{
		php_error (E_WARNING, "SQLite: %s", err);
		sqlite_freemem(err);
		free(r->db);
		free(r);
		return;
	}
	
	r->open = 1;

	ret = zend_list_insert(r, SQLITE_G(le_sqlite));

	RETURN_LONG(ret);
}
/* }}} */

/* {{{ proto string sqlite_version( void )
   Returns version number of sqlite library in use */
ZEND_FUNCTION(sqlite_version)
{
	if(ZEND_NUM_ARGS() != 0)
	{
		WRONG_PARAM_COUNT;
        }
	
	RETURN_STRINGL((char*)sqlite_version, strlen(sqlite_version), 1);
}
/* }}} */

/* {{{ proto string sqlite_encoding( void )
 *    Returns encoding SQLite was compiled with */
ZEND_FUNCTION(sqlite_encoding)
{
	if(ZEND_NUM_ARGS() != 0)
	{
		WRONG_PARAM_COUNT;
	}
	
	RETURN_STRINGL((char*)sqlite_encoding, strlen(sqlite_encoding), 1);
}
/* }}} */


/* {{{ proto sqlite_last_insert_rowid(int sqlite_handle)
       Returns the ID of the last inserted ROW */
ZEND_FUNCTION(sqlite_last_insert_rowid)
{
	int sqlite_id;
	sqlite_resource *res;
	int sqlite_type;

	if (zend_parse_parameters(ZEND_NUM_ARGS() TSRMLS_CC, "l", &sqlite_id) == FAILURE) 
	{
                return;
        }

	res = zend_list_find(sqlite_id, &sqlite_type);

        if(sqlite_type != SQLITE_G(le_sqlite))
                RETURN_FALSE;
	
	if(res->open)
	{
		RETURN_LONG(sqlite_last_insert_rowid(res->db));
	}

	RETURN_FALSE;
}
/* }}} */

/* {{{ proto bool sqlite_complete(string sql_string)
       Returns if the SQL string is complete or not */
ZEND_FUNCTION(sqlite_complete)
{
	int sql_length;
	char *sql;

	if (zend_parse_parameters(ZEND_NUM_ARGS() TSRMLS_CC, "s", &sql, &sql_length) == FAILURE) {
		return;
	}

	if (sql_length > 0)
	{
		if (sqlite_complete(sql))
		{
			RETURN_TRUE;
		}
	}
	
	RETURN_FALSE;
}
/* }}} */

/* {{{ proto int sqlite_exec(string sql, int sqlite_handle) 
       Returns handle to result set if any */
ZEND_FUNCTION(sqlite_exec)
{
        char *err;
	int nrow, ncol;
	int res1;
	char *command = NULL;
	int commandLength = 0;
	int rr_id;
        int sqlite_id;
        int sqlite_type;
        sqlite_resource *res;
	sqlite_result *rr;

        if (zend_parse_parameters(ZEND_NUM_ARGS() TSRMLS_CC, "sl", &command, &commandLength, &sqlite_id) == FAILURE)
	{
                return;
        }

        res = (sqlite_resource*) zend_list_find(sqlite_id, &sqlite_type);

        if(sqlite_type != SQLITE_G(le_sqlite))
                RETURN_FALSE;

        if (res->open)
        {
		/* Database is curently open lets do the query */
		if (sqlite_complete(command))
		{
			/* SQL Statement looks OK */
			
			rr = (sqlite_result*)malloc(sizeof(sqlite_result));
			
			res1 = sqlite_get_table(res->db, command, (&rr->result), &nrow, &ncol, &err); 

			if(res1 != SQLITE_OK)
			{
	                        php_error (E_WARNING, "SQLite query error: %s", err);
                                sqlite_freemem(err);
				free(rr);
				RETURN_FALSE;
			}
		       	
			if(ncol > 0)
			{
				/* If we have some results then send back a handle for them */
				rr->nrow = nrow;
				rr->ncol = ncol;
				rr_id = zend_list_insert(rr, SQLITE_G(le_sqlite_result));
				RETURN_LONG(rr_id);
			}
		} else {
			/* SQL Statement incorrect */
	                php_error (E_WARNING, "Sqlite query error");
			RETURN_FALSE;
		}
        } else {
           php_error (E_WARNING, "Sqlite: database not open");

	   RETURN_FALSE; /* DB was not open? */
        }
	
	RETURN_TRUE;
}
/* }}} */

/* {{{ proto array sqlite_fetch_array(int sqlite_result)
       Returns the Array from result set */
ZEND_FUNCTION(sqlite_fetch_array)
{
	int result_id;
	sqlite_result *result;
	int sqlite_type;
	int ccol, crow;
	zval *array;
	static const char *tmp_ptr, *empty_string = "";
	
	if (zend_parse_parameters(ZEND_NUM_ARGS() TSRMLS_CC, "l", &result_id) == FAILURE) {
		return;
	}

	result = (sqlite_result*) zend_list_find(result_id, &sqlite_type);

	if(sqlite_type != SQLITE_G(le_sqlite_result))
		RETURN_FALSE;

	if(array_init(return_value))
	{
		RETURN_FALSE;
	}

	for(crow = 0; crow < result->nrow; crow++)
	{
		MAKE_STD_ZVAL(array);
		
		if(array_init(array) != SUCCESS)
		{
			RETURN_FALSE;
		}
		
		for(ccol = 0; ccol < result->ncol; ccol++)
		{
                        if ((tmp_ptr = (void*)result->result[ccol+(result->ncol*(crow+1))]))
				add_next_index_string(array, (void*)tmp_ptr , 1);
			else
				add_next_index_string(array, (void*)empty_string , 1);
				
		}
		
		zend_hash_next_index_insert(return_value->value.ht, &array, sizeof(zval), NULL);
	}
}
/* }}} */

/* {{{ proto array sqlite_fetch_field_array(int sqlite_result)
       Returns the Array of field names */
ZEND_FUNCTION(sqlite_fetch_field_array)
{
	int result_id;
	sqlite_result *result;
	int sqlite_type;
	int ccol;
	zval *array;

	if (zend_parse_parameters(ZEND_NUM_ARGS() TSRMLS_CC, "l", &result_id) == FAILURE) {
		return;
	}

	result = (sqlite_result*) zend_list_find(result_id, &sqlite_type);

	if(sqlite_type != SQLITE_G(le_sqlite_result))
		RETURN_FALSE;

	if(array_init(return_value) != SUCCESS)
	{
		RETURN_FALSE;
	}

	for(ccol = 0; ccol < result->ncol; ccol++)
	{
		add_next_index_string(return_value, (void*)result->result[ccol] , 1);
	}
}
/* }}} */

/* {{{ proto int sqlite_changes(int sqlite_handle)
       Returns number of rows that changed */
ZEND_FUNCTION(sqlite_changes)
{
	int sqlite_id;
	int sqlite_type;
	sqlite_resource *res;

	if (zend_parse_parameters(ZEND_NUM_ARGS() TSRMLS_CC, "l", &sqlite_id) == FAILURE) {
		return;
	}

	res = (sqlite_resource*) zend_list_find(sqlite_id, &sqlite_type);

	if(sqlite_type != SQLITE_G(le_sqlite))
		RETURN_FALSE;
	
	if(res->open) {
		RETURN_LONG( sqlite_changes(res->db) );
	}

	RETURN_FALSE;
}
/* }}} */

/*
 * Local variables:
 * tab-width: 4
 * c-basic-offset: 4
 * indent-tabs-mode: t
 * End:
 */
