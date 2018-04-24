<?php
class Db
{
    private static $instance = null;
    private $_db;

    private function __construct()
    {
        try {
            $this->_db = new PDO('mysql:host=localhost;dbname=dbc;charset=utf8','root','');
            $this->_db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
			$this->_db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);
        }
		catch (PDOException $e) {
		    die('Erreur de connexion à la base de données : '.$e->getMessage());
        }
    }

	# Pattern Singleton pour avoir une seule connexion à la Db
    public static function getInstance()
    {
        if (is_null(self::$instance)) {
            self::$instance = new Db();
        }
        return self::$instance;
    }
  	public function insert_subscription($date,$amount,$user_id,$paid) {
  		# Solution d'INSERT avec prepared statement
  		$query = 'INSERT INTO subscriptions (date,amount,user_id,paid) values (:date,:amount,:user_id,:paid)';
  		$ps = $this->_db->prepare($query);
  		$ps->bindValue(':date',$date);
  		$ps->bindValue(':amount',$amount);
      $ps->bindValue(':user_id',$user_id);
      $ps->bindValue(':paid',$paid);
  		return $ps->execute();
  	}

  	public function delete_subscription($id) {
  		# Solution de DELETE avec prepared statement
  		$query = 'DELETE FROM subscription WHERE subscription_id=:subscription_id LIMIT 1';
  		$ps = $this->_db->prepare($query);
  		$ps->bindValue(':subscription_id',$id);
  		return $ps->execute();
  	}
    # Fonction qui exécute un SELECT dans la table des evenements
    # et qui renvoie un tableau d'objet(s) de la classe evenement
    # le keyword est l'ID de l'evenement
    public function select_subscription_id($keyword='') {
      # Définition du query et préparation
      if ($keyword != '') {
        $keyword = str_replace("%", "\%", $keyword);
        $query = "SELECT * FROM subscriptions WHERE subscription_id LIKE :keyword COLLATE utf8_bin";
        $ps = $this->_db->prepare($query);
        # Le bindValue se charge de quoter proprement les valeurs des variables sql
        $ps->bindValue(':keyword',"%$keyword%");
      } else {
        $query = 'SELECT * FROM subscriptions';
        $ps = $this->_db->prepare($query);
      }

      # Exécution du prepared statement
      $ps->execute();

      $tableau = array();
      # Parcours de l'ensemble des résultats
      # Construction d'un tableau d'objet(s) de la classe Livre
      # Si le tableau est vide, on ne rentre pas dans le while
      while ($row = $ps->fetch()) {
        $tableau[] = new Subscription($row->date,$row->amount,$row->user_id,$row->paid,$row->subscription_id);
      }
      # Pour debug : affichage du tableau à renvoyer
        # var_dump($tableau);
      return $tableau;
    }
    public function insert_event($name,$organizer,$price,$address,$description) {
  		# Solution d'INSERT avec prepared statement
  		$query = 'INSERT INTO events (name,organizer,price,address,description) values (:name,:organizer,:price,:address,:description)';
  		$ps = $this->_db->prepare($query);
  		$ps->bindValue(':name',$name);
  		$ps->bindValue(':organizer',$organizer);
      $ps->bindValue(':price',$price);
      $ps->bindValue(':address',$address);
      $ps->bindValue(':description',$description);
  		return $ps->execute();
  	}
    public function get_all_events(){
      $query='SELECT * FROM events ORDER BY num';
      $result = $this->_db->query($query);
      $events = array();
      if($result->rowcount()==0){
          return array();
      }
      else{
        while($row = $result->fetch()){
          $events[] = new Event($row->num,$row->date,$row->name,$row->description,$row->location,$row->price);
        }
        return $events;
      }
    }

	# Fonction qui exécute un SELECT dans la table des utilisateur
	# et qui renvoie un tableau d'objet(s) de la classe utilisateurs
  # le keyword est l'adresse email de l'utilisateur
	public function select_users_mail($keyword='') {
		# Définition du query et préparation
		if ($keyword != '') {
			$keyword = str_replace("%", "\%", $keyword);
			$query = "SELECT * FROM users WHERE mail LIKE :keyword COLLATE utf8_bin";
			$ps = $this->_db->prepare($query);
			# Le bindValue se charge de quoter proprement les valeurs des variables sql
			$ps->bindValue(':keyword',"%$keyword%");
		} else {
			$query = 'SELECT * FROM users';
			$ps = $this->_db->prepare($query);
		}
		# Exécution du prepared statement
		$ps->execute();

		$tableau = array();
		# Parcours de l'ensemble des résultats
		# Construction d'un tableau d'objet(s) de la classe Livre
		# Si le tableau est vide, on ne rentre pas dans le while
		while ($row = $ps->fetch()) {
			$tableau[] = new User($row->id,$row->name,$row->surname,$row->mail,$row->phone,$row->address,$row->bank,$row->photo,$row->type,$row->password);
		}
		# Pour debug : affichage du tableau à renvoyer
	    # var_dump($tableau);
		return $tableau;
	}
  public function select_users_id($keyword='') {
    # Définition du query et préparation
    if ($keyword != '') {
      $keyword = str_replace("%", "\%", $keyword);
      $query = "SELECT * FROM users WHERE id LIKE :keyword COLLATE utf8_bin";
      $ps = $this->_db->prepare($query);
      # Le bindValue se charge de quoter proprement les valeurs des variables sql
      $ps->bindValue(':keyword',"%$keyword%");
    } else {
      $query = 'SELECT * FROM users';
      $ps = $this->_db->prepare($query);
    }
  # Exécution du prepared statement
  $ps->execute();

  $tableau = array();
  # Parcours de l'ensemble des résultats
  # Construction d'un tableau d'objet(s) de la classe Livre
  # Si le tableau est vide, on ne rentre pas dans le while
  while ($row = $ps->fetch()) {
    $tableau[] = new User($row->id,$row->name,$row->surname,$row->mail,$row->phone,$row->address,$row->bank,$row->photo,$row->type,$row->password);
  }
  # Pour debug : affichage du tableau à renvoyer
    # var_dump($tableau);
  return $tableau;
}
	public function insert_user($name,$surname,$mail,$phone,$address,$bank,$photo,$type,$password) {
		# Solution d'INSERT avec prepared statement
		$query = 'INSERT INTO users (name,surname,mail,phone,address,bank,photo,type,password) values (:name,:surname,:mail,:phone,:address,:bank,:photo,:type,:password)';
		$ps = $this->_db->prepare($query);
		$ps->bindValue(':name',$name);
		$ps->bindValue(':surname',$surname);
    $ps->bindValue(':mail',$mail);
    $ps->bindValue(':phone',$phone);
    $ps->bindValue(':address',$address);
    $ps->bindValue(':bank',$bank);
    $ps->bindValue(':photo',$photo);
    $ps->bindValue(':type',$type);
    $ps->bindValue(':password',$password);
		return $ps->execute();
	}

	public function delete_user($mail) {
		# Solution de DELETE avec prepared statement
		$query = 'DELETE FROM users WHERE mail=:mail LIMIT 1';
		$ps = $this->_db->prepare($query);
		$ps->bindValue(':mail',$mail);
		return $ps->execute();
	}

	public function update_user($name,$surname,$mail,$phone,$address,$bank,$photo,$type,$password) {
		$query = 'UPDATE users SET name=:name,surname=:surname,phone=:phone,address=:address,bank=:bank,photo=:photo,type=:type,password=:password  WHERE mail=:mail';
		$ps = $this->_db->prepare($query);
    $ps->bindValue(':name',$name);
		$ps->bindValue(':surname',$surname);
    $ps->bindValue(':mail',$mail);
    $ps->bindValue(':phone',$phone);
    $ps->bindValue(':address',$address);
    $ps->bindValue(':bank',$bank);
    $ps->bindValue(':photo',$photo);
    $ps->bindValue(':type',$type);
    $ps->bindValue(':password',$password);
		return $ps->execute();
	}
  public function update_member($name,$surname,$mail,$phone,$address,$bank,$photo,$password){
   $query = 'UPDATE users SET name=:name,surname=:surname,mail=:mail;phone=:phone,address=:address,bank=:bank,photo=:photo,password=:password  WHERE mail=:mail';
   $ps = $this->_db->prepare($query);
   $ps->bindValue(':name',$name);
   $ps->bindValue(':surname',$surname);
   $ps->bindValue(':mail',$mail);
   $ps->bindValue(':phone',$phone);
   $ps->bindValue(':address',$address);
   $ps->bindValue(':bank',$bank);
   $ps->bindValue(':photo',$photo);
   $ps->bindValue(':password',$password);
   return $ps->execute();
 }

	public function validate_user($mail,$password) {
		$query = 'SELECT password from users WHERE mail=:mail';
		$ps = $this->_db->prepare($query);
		$ps->bindValue(':mail',$mail);
		$ps->execute();
		if ($ps->rowcount() == 0)
			return false;
		$hash = $ps->fetch()->password;
		return password_verify($password, $hash);
	}

	public function user_exists($mail) {
		$query = 'SELECT * from users WHERE mail=:mail';
		$ps = $this->_db->prepare($query);
		$ps->bindValue(':mail',$mail);
		$ps->execute();
		return ($ps->rowcount() != 0);
	}

	public function update_password($mail,$password) {
		$query = 'UPDATE users SET password=:password WHERE mail=:mail';
		$ps = $this->_db->prepare($query);
		$ps->bindValue(':mail',$mail);
		$ps->bindValue(':password',$password);
		return $ps->execute();
	}
  public function add_participation($user,$name,$price,$date_event,$location,$description,$num_event,$interested,$interested,$take_part,$paid){
    $query = 'INSERT INTO participations VALUES (:user,:name,:price,:date_event,:location,:description,:num_event,:interested,:take_part,:paid)';
    $ps = $this->_db->prepare($query);
    $ps->bindValue(':user',$user);
    $ps->bindValue(':name',$name);
    $ps->bindValue(':price',$price);
    $ps->bindValue('date_event',$date_event);
    $ps->bindValue(':location',$location);
    $ps->bindValue(':description',$description);
    $ps->bindValue(':num_event',$num_event);
    $ps->bindValue(':interested',$interested);
    $ps->bindValue(':take_part',$take_part);
    $ps->bindValue(':paid',$paid);
    return $ps->execute();
  }

  public function get_all_participations($currentUserId){
    $query = 'SELECT * FROM participations ORDER BY date';
    $ps = $this->_db->prepare($query);
    $result = $this->_db->query($query);
    $events = array();
    var_dump($query);
    if($result->rowcount()==0){
        return array();
    }
    else{
      while($row = $result->fetch()){
        $events[] = new Participation($row->user,$row->num_event,$row->date,$row->name,$row->description,$row->location,$row->price,$row->interested,$row->take_part,$row->paid);
      }
      return $events;
    }
  }

  public function check_event($num_event){
    $query = 'SELECT * FROM participations WHERE num_event="'.$num_event.'"';
    var_dump($num_event);
    $result=$this->_db->query($query);
    $event = array();
    if($result->rowcount()==0){
        return null;
    }
    else{
      while($row = $result->fetch()){
        $event[] = new Participation($row->user,$row->num_event,$row->date,$row->price,$row->name,$row->location,$row->description,$row->interested,$row->take_part,$row->paid);
      }
      return $event;
    }
  }

  public function delete_interested_event($num_event_unsubscribe){
    $query = 'DELETE FROM participations WHERE num_event="'.$num_event_unsubscribe.'"';
    $ps = $this->_db->prepare($query);
    return $ps->execute();
  }
  public function get_user($mail){
    $query = 'SELECT * FROM users WHERE mail LIKE '."'%".$mail."%'";
    $result = $this->_db->query($query);
    $row = $result->fetch();
    if($row){
      return new User($row->id,$row->mail,$row->name,$row->surname,$row->phone,$row->address,$row->bank,$row->photo,$row->type,$row->password);
    }else {
      return null;
    }
  }



}
