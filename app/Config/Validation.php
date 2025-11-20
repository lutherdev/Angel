<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Validation\StrictRules\CreditCardRules;
use CodeIgniter\Validation\StrictRules\FileRules;
use CodeIgniter\Validation\StrictRules\FormatRules;
use CodeIgniter\Validation\StrictRules\Rules;

class Validation extends BaseConfig
{
    // --------------------------------------------------------------------
    // Setup
    // --------------------------------------------------------------------

    /**
     * Stores the classes that contain the
     * rules that are available.
     *
     * @var list<string>
     */
    public array $ruleSets = [
        Rules::class,
        FormatRules::class,
        FileRules::class,
        CreditCardRules::class,
    ];

    /**
     * Specifies the views that are used to display the
     * errors.
     *
     * @var array<string, string>
     */
    public array $templates = [
        'list'   => 'CodeIgniter\Validation\Views\list',
        'single' => 'CodeIgniter\Validation\Views\single',
    ];

    // --------------------------------------------------------------------
    // Rules
    // --------------------------------------------------------------------
      // Rules for signup
    public array $signup = [
        'username' => 'required|is_unique[tblusers.username]|alpha_numeric',
        'password' => 'required|min_length[6]|max_length[16]',
        'email' => 'required|valid_email',
        //'confirmpassword' => 'matches[password]',
        'firstname' => 'required|alpha_space',
        'middlename' => 'permit_empty|alpha_space',
        'lastname' => 'required|alpha_space',
        'role' => 'required'
    ];

      // Rules for equipments
    public array $eqpvalid = [
        'name' => 'required|alpha_space',
        'description' => 'required|alpha_space',
        'quantity' => 'required|numeric',
    ];
}
