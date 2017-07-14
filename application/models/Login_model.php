<?php
class Login_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}

	public function get_user($username)
	{
		$this->db->select('name, username, password, users_type, project_id');
		$this->db->from('users');
		$this->db->where('username', $username);
		$query = $this->db->get();

		return $query->result_array();
	}

	public function get_users()
	{
		$query = $this->db->get('users');
		return $query->result_array();
	}
	
	
	/* PANIE ALEŚ PAN ODJEBAŁ..... */
	//ale to jest chyba dramat co? :P w modelu robić coś takiego.
	// panie.... tez tak robilem, nie ma co sie łamac :D xD
	// ale generalnie model wyciąga z bazy usernama i hasło, kontroler to porównuje i w razie czego przypisuje do danych sesyjnych?
	// nie wiem dokladnie jakie sa standardy w php, w ruby on rails, jest filozofia "thin controllers", czyli kontroler ma byc w uj cienki
	// polega to na tym ze wiekszosc logiki jest robiona w innych klasach.
	//np. kontroler dostaje parametry username oraz password, przekazuje to do klasy ValidateUser.
	//w ów klasie ValidateUser, odwołuje się do modelu Users, sprawdzajac czy zwroci mi rekord z userem.
	// porownuje otrzymany rekord z haslem, jak poporawnie, ustawiam cookie, a sama klasa moze zwrocic wartosc true lub false
	// ok... :p czyli ValideteUser extends jakąś klasę wyżej? bo póki co robię generalnie klasy jednopoziomowe, tzn. bez dziedziczących
	// bo jeszcze nie miałem pomysłu jak to miałoby działać / ewentualnie póki co chcę, żeby w ogóle działało :p
	
	// zrob na razie jak Ci wyjdzie, a potem pogadamy jak ja bym to widzial ;)
	// ok
	
	//z tym extends, mozna np. zrobic kontroler ValidateUsers, gdzie..... ok nie ma tutaj callbackow, ale mozna stowrzyc
	// klase validateusers z konstruktorem, gdzie sprawdzam uzytkownika, czy jest zalogowany.
	// i potem ta klase dziedziczysz w innych kontrolerach
	// no tak, wtedy nie musisz się bawić, żeby w kilku miejscach sprawdzać czy user jest zalogowany. Zgadza się.
	// w sumie nie byłoby to takie trudnie, bo ValidateUsers extend CI_Controllers, a reszta, extends ValidateUsers
	// no ale jak wiemy nie wszystko co proste, prosto chce iść :p
	
	// oj tam oj tam :d ps. teraz widze pare rzeczy, ktorych mi tutaj brakuje, w tym frameworku :D
	// ze np. moge sobie na kontrole wywolac tzw. callback - before_action. Dziala on w ten sposob, ze klasa kontrolera jest zainicjalizowana
	// ale metoda jescze nie jest wywolana, tylko najpierw idzie taki callback, gdzie moge wywolac dowolna metode.
	
	public function check_user($username, $password){
		$this->db->select('id, name, username, password, users_type, project_id');
		$this->db->from('users');
		$this->db->where('username', $username);
		$query = $this->db->get();
		$row = $query->row();
		
		if ($username == $row->username && $password == $row->password){
			session_start();	
			$_SESSION["project_id"] = $row->project_id;
			$_SESSION["user"]		= $row->id;
			$_SESSION["user_type"]	= $row->users_type;
			if ($row->users_type == "admin"){
				return redirect('/admin/main/', $var);
			}
			return redirect('/project/view/', $var);
		} else {
			$var = "niezalogowany";
		}
		echo $var;
		
		return $var;
	}
}