# Logo
$wgLogos = [ '1x' => "/logo.svg" ];

# Private Wiki
$wgGroupPermissions['*']['read'] = false;
$wgGroupPermissions['*']['edit'] = false;
$wgGroupPermissions['*']['createaccount'] = false;

# https://www.mediawiki.org/wiki/Topic:Vv35plp6g16qno0s
if ( $_SERVER['REMOTE_ADDR'] == '127.0.0.1' ) {
  $wgGroupPermissions['*']['read'] = true;
  $wgGroupPermissions['*']['edit'] = true;
}

# LDAP
wfLoadExtension( 'PluggableAuth' );
wfLoadExtension( 'LDAPProvider' );
wfLoadExtension( 'LDAPAuthentication2' );
$wgGroupPermissions['*']['createaccount'] = false;
$wgGroupPermissions['*']['autocreateaccount'] = true;
$wgPasswordResetRoutes = false;

# Visual Editor
wfLoadExtension( 'VisualEditor' );
wfLoadExtension( 'Parsoid', "vendor/wikimedia/parsoid/extension.json" );
$wgVirtualRestConfig['modules']['parsoid'] = [
  'url' => 'http://localhost' . $wgScriptPath . '/rest.php',
];
