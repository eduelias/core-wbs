if ( $?prompt ) then
  set autoexpand
  set autolist
  set cdpath = ( ~ )
  set pushdtohome

  if ( -e ~/.alias ) then
    source ~/.alias
  endif

endif
