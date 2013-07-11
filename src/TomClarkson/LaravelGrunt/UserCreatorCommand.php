<?php namespace TomClarkson\LaravelGrunt;

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class UserCreatorCommand extends Command {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'user:create';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Create a new user.';

	protected $creator;

	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct(UserCreator $creator)
	{
		parent::__construct();

		$this->creator = $creator;
	}

	/**
	 * Execute the console command.
	 *
	 * @return void
	 */
	public function fire()
	{
		// php artisan user:create jennifer@designsight.co.nz tomiscool
		// 
		$fields = $this->getFields();

		$this->creator->create($fields);

		$this->info('Created user.');

	}

	protected function getFields() 
	{
		$email = $this->argument('email');
		$password = $this->argument('password');

		return compact('email', 'password');
	}


	/**
	 * Get the console command arguments.
	 *
	 * @return array
	 */
	protected function getArguments()
	{
		return array(
			array('email', InputArgument::REQUIRED, 'Email for new record.'),
			array('password', InputArgument::REQUIRED, 'Password for new record.'),
		);
	}

	

}