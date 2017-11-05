/*
   +----------------------------------------------------------------------+
   | Authors: Chris Burton <chris@max-hosting.net>                        |
   | Patches: Sebastiano Suraci                                           |
   |                                                                      |
   +----------------------------------------------------------------------+
 */

#ifndef PHP_SQLITE_H
#define PHP_SQLITE_H

#include "sqlite.h"

static char sqlite_php_version[] = "0.0.5";

typedef struct {
	int open;
	struct sqlite *db;
} sqlite_resource;

typedef struct {
	int nrow;
	int ncol;
	char **result;
} sqlite_result;

extern zend_module_entry sqlite_module_entry;

#define phpext_sqlite_ptr &sqlite_module_entry

#ifdef PHP_WIN32
#define PHP_SQLITE_API __declspec(dllexport)
#else
#define PHP_SQLITE_API
#endif

PHP_MINIT_FUNCTION(sqlite);
PHP_MSHUTDOWN_FUNCTION(sqlite);
PHP_RINIT_FUNCTION(sqlite);
PHP_RSHUTDOWN_FUNCTION(sqlite);
PHP_MINFO_FUNCTION(sqlite);

ZEND_BEGIN_MODULE_GLOBALS(sqlite)
	int le_sqlite;
	int le_sqlite_result;
ZEND_END_MODULE_GLOBALS(sqlite)

#ifdef ZTS
#define SQLITE_G(v) (sqlite_globals->v)
#define SQLITE_LS_FETCH() zend_sqlite_globals *sqlite_globals = ts_resource(sqlite_globals_id)
#else
#define SQLITE_G(v) (sqlite_globals.v)
#define SQLITE_LS_FETCH()
#endif

#endif	/* PHP_SQLITE_H */


/*
 * Local variables:
 * tab-width: 4
 * c-basic-offset: 4
 * indent-tabs-mode: t
 * End:
 */
