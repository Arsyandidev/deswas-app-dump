<?php

/**
 * Created by PhpStorm.
 * User: ulfahcn
 * Date: 08/07/21
 * Time: 13.18
 */

namespace App\Custom;

use Illuminate\Http\Request;

/**
 * Class LdapHelper
 * @package App\Custom
 */
class LdapHelper
{

    /**
     * @var array
     */
    private $ldap;
    /**
     * @var
     */
    private $searchDn;
    /**
     * @var
     */
    private $ldapLogin;
    /**
     * @var
     */
    private $ldapAdminDn;
    /**
     * @var
     */
    private $password;
    /**
     * @var
     */
    private $url;

    /**
     * LdapHelper constructor.
     */
    public function __construct()
    {

        $this->ldapAdminDn = env('ldapAdminDn');
        $this->password = env('ldapPassword');
        $this->url = env('ldapUrl');
        $this->searchDn = env('searchDn');
        $this->ldapLogin = env('ldapLogin');
        $this->ldap = $this->connect();
    }

    /**
     * @return array
     */
    public function connect()
    {
        $ldap = @ldap_connect($this->url);
        $ds = ldap_connect($this->url) or die("Could not connect to $this->url ");
        ldap_set_option($ldap, LDAP_OPT_PROTOCOL_VERSION, 3);
        ldap_set_option($ldap, LDAP_OPT_REFERRALS, 8);
        $bind = @ldap_bind($ldap, $this->ldapAdminDn, $this->password);
        return ['status' => $bind, 'data' => $ldap];
    }

    /**
     * @param $username
     * @return bool
     */
    public function findUser($username)
    {
        if ($this->ldap['status']) {
            $data = $this->ldap['data'];
            $filter = str_replace("{username}", $username, $this->ldapLogin);
            $result = ldap_search($data, $this->searchDn, $filter);
            $info = ldap_get_entries($data, $result);
            if ($info['count'] > 0) {
                return $info[0];
            }
            return false;
        }
    }

    /**
     * @param Request $request
     */
    public function attemptLogin(Request $request)
    {
        $credentials = $request->toArray();
        $findUser = $this->findUser($credentials['username']);
        if (!empty($findUser)) {
            if (@ldap_bind($this->ldap['data'], $findUser['dn'], $credentials['password'])) {
                return true;
            }
            return [
                'error' => 1,
                'message' => 'Username atau kata sandi salah.',
            ];
        }
    }


    /**
     *
     */
    public function __destruct()
    {
        return @ldap_close($this->ldap['data']);
    }
}
