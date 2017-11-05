dnl $Id$
dnl config.m4 for extension sqlite


PHP_ARG_WITH(sqlite, for sqlite support,
[  --with-sqlite           Include sqlite support])

if test "$PHP_SQLITE" != "no"; then

  dnl # --with-sqlite -> check with-path
  SEARCH_PATH="/usr/local /usr"     # you might want to change this
  SEARCH_FOR="/include/sqlite.h"  # you most likely want to change this
  if test -r $PHP_SQLITE/; then # path given as parameter
    SQLITE_DIR=$PHP_SQLITE
  else # search default path list
    AC_MSG_CHECKING(for sqlite files in default path)
    for i in $SEARCH_PATH ; do
      if test -r $i/$SEARCH_FOR; then
        SQLITE_DIR=$i
        AC_MSG_RESULT(found in $i)
      fi
    done
  fi
  dnl
  if test -z "$SQLITE_DIR"; then
    AC_MSG_RESULT(not found)
    AC_MSG_ERROR(Please reinstall the sqlite distribution)
  fi

  dnl # --with-sqlite -> add include path
  PHP_ADD_INCLUDE($SQLITE_DIR/include)

  dnl # --with-sqlite -> chech for lib and symbol presence
  LIBNAME=sqlite # you may wnat to change this

  PHP_SUBST(SQLITE_SHARED_LIBADD)
  PHP_ADD_LIBRARY_WITH_PATH($LIBNAME, $SQLITE_DIR/lib, SQLITE_SHARED_LIBADD)

  PHP_EXTENSION(sqlite, $ext_shared)
fi
