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
        'password' => [
            'rules' => 'required|min_length[6]|max_length[16]|regex_match[/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]+$/]',
            'errors' => [
                'regex_match' => 'Password must contain at least one letter, one number, and one special character.'
            ]
        ],
        'email' => 'required|valid_email|is_unique[tblusers.email]',
        //'confirmpassword' => 'matches[password]',
        'firstname' => 'required|alpha_space',
        'middlename' => 'permit_empty|alpha_space',
        'lastname' => 'required|alpha_space',
        'role' => 'required'
    ];

    public array $resetPassword= [
        'new_pass' => [
            'rules' => 'required|min_length[6]|max_length[16]|regex_match[/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&]).+$/]',
            'errors' => [
                'regex_match' => 'Password must contain at least one letter, one number, and one special character.'
            ]
        ],
        'confirm_pass' => 'required|matches[new_pass]'
    ];

    public array $changePassword= [
        'current_password' => 'required',
        'new_pass' => [
            'rules' => 'required|min_length[6]|max_length[16]|regex_match[/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&]).+$/]',
            'errors' => [
                'regex_match' => 'Password must contain at least one letter, one number, and one special character.'
            ]
        ],
        'confirm_pass' => 'required|matches[new_pass]'
    ];

      // Rules for equipments
    public array $eqpvalid = [
        'name' => 'required|alpha_space',
        'description' => 'required|alpha_space',
        'quantity' => 'required|numeric',
    ];
}
