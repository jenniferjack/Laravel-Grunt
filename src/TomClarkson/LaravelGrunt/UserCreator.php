<?php namespace TomClarkson\LaravelGrunt;

use User;
use Hash;

class UserCreator {

	public function create(array $fields, User $user = null)
	{
		$user = $user ?: new User;

		$user->email = $fields['email'];
		$user->password = Hash::make($fields['password']);

		return $user->save();

	}
}