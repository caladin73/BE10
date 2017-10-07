<?php
/**
 * Description of User
 *
 * @author nml
 */
class User extends Model {
    private $uid;       // string
    private $password;  // string ll=128
    private $pwd;
    
    public function __construct($uid) {
        $this->uid = $uid;
    }    

    public function setPwd($pwd) {
        $this->pwd = $pwd;
    }
    public function getPwd() {
        return $this->pwd;
    }
    
    public function getUid() {
        return $this->uid;
    }

    public function create() {
        $sql = "insert into user (uid, password) 
                        values (:uid, :pwd)";

        $dbh = Model::connect();
        try {
            $q = $dbh->prepare($sql);
            $q->bindValue(':uid', $this->getUid());
            $q->bindValue(':pwd', password_hash($this->getPwd(), PASSWORD_DEFAULT));
            $q->execute();
        } catch(PDOException $e) {
            printf("<p>Insert of user failed: <br/>%s</p>\n",
                $e->getMessage());
        }
        $dbh->query('commit');
    }

    public function update() { /*nop*/ }
    public function delete() { /*nop*/ }
    
    public static function retrievem() {
        $users = array();
        $dbh = Model::connect();

        $sql = "select *";
        $sql .= " from user";
        try {
            $q = $dbh->prepare($sql);
            $q->execute();
            while ($row = $q->fetch()) {
                $user = self::createObject($row);
                array_push($users, $user);
            }
        } catch(PDOException $e) {
            printf("<p>Query of users failed: <br/>%s</p>\n",
                $e->getMessage());
        } finally {
            return $users;
        }
    } 

        public static function createObject($a) {
        $uid = $a['uid'];
        $user = new User($uid);
        if (isset($a['pwd1'])) {
            $user->setPwd($a['pwd1']);
        }
        return $user;
    }
}
