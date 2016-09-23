<?php namespace App\Services;
class Statut  {
	/**
	 * Set the login user statut
	 * 
	 * @param  Illuminate\Auth\Events\Login $login
	 * @return void
	 */
	public function setLoginStatut($login)
	{
		session()->set('statut', $login->user->role->slug);
		$this->setRoleId();
	}
	/**
	 * Set the visitor user statut
	 * 
	 * @return void
	 */
	public function setVisitorStatut()
	{
		session()->set('statut', 'visitor');
		$this->setRoleId();
	}
	/**
	 * Set the statut
	 * 
	 * @return void
	 */
	public function setStatut()
	{
		session()->set('statut', auth()->check() ?  auth()->user()->role->slug : 'visitor');
		$this->setRoleId();
	}


	/**
	* Get the statut
	*
	* @return string
	*/
	public static function getStatut()
	{
		return session()->get('statut');
	}

	/**
	* Set the role id
	* 
	* @return void
	*/
	public function setRoleId()
	{
		session()->set('role id', auth()->check() ?  auth()->user()->role_id :99);
		session()->set('public id', auth()->check() ?  auth()->user()->public_id :'');
	}


	/**
	* Get the role id
	*
	* @return string
	*/
	public static function getRoleId()
	{
		return session()->get('role id');
	}

	public static function getPublicId()
	{
		return session()->get('public id');
	}
}