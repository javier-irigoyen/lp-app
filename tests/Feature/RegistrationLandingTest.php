<?php

namespace Tests\Feature;

use App\Http\Livewire\Landing;
use App\Models\Lead;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class RegistrationLandingTest extends TestCase
{
    use RefreshDatabase;

    //test livewire component is ok
    public function test_registration_landing_contains_livewire_component()
    {
        $this->get('/')->assertSeeLivewire('landing');
    }

    //test registration is ok
    public function test_can_register_landing()
    {
        Livewire::test(Landing::class)
        ->set('name', 'javier sharvel')
        ->set('last_name', 'irigoyen matos')
        ->set('email', 'sharvel.irigoyen@gmail.com')
        ->set('phone', '993994620')
        ->call('save')
        ->assertNoRedirect('/');
        $this->assertTrue(Lead::whereName('javier sharvel')->exists());
        $this->assertTrue(Lead::whereLastName('irigoyen matos')->exists());
        $this->assertTrue(Lead::whereEmail('sharvel.irigoyen@gmail.com')->exists());
        $this->assertTrue(Lead::wherePhone('993994620')->exists());

    }

    // test name
    public function test_name_required_landing()
    {
        Livewire::test(Landing::class)
        ->set('name', '')
        ->set('last_name', 'irigoyen matos')
        ->set('email', 'sharvel.irigoyen@gmail.com')
        ->set('phone', '993994620')
        ->call('save')
        ->assertHasErrors(['name'=>'required']);
    }

    public function test_name_is_letters_and_spaces_landing()
    {
        Livewire::test(Landing::class)
        ->set('name', '#%&')
        ->set('last_name', 'irigoyen matos')
        ->set('email', 'sharvel.irigoyen@gmail.com')
        ->set('phone', '993994620')
        ->call('save')
        ->assertHasErrors(['name'=>'regex:/^[a-zA-Z\s]+$/']);
    }

    public function test_name_is_max_60_landing()
    {
        Livewire::test(Landing::class)
        ->set('name', 'Javier Sharvel Javier Sharvel Javier Sharvel Javier Sharvel Javier')
        ->set('last_name', 'irigoyen matos')
        ->set('email', 'sharvel.irigoyen@gmail.com')
        ->set('phone', '993994620')
        ->call('save')
        ->assertHasErrors(['name'=>'max:60']);
    }
    // test lastname

    public function test_lastname_required_landing()
    {
        Livewire::test(Landing::class)
        ->set('name', 'javier sharvel')
        ->set('last_name', '')
        ->set('email', 'sharvel.irigoyen@gmail.com')
        ->set('phone', '993994620')
        ->call('save')
        ->assertHasErrors(['last_name'=>'required']);
    }
    public function test_lastname_is_letters_and_spaces_landing()
    {
        Livewire::test(Landing::class)
        ->set('name', 'javier sharvel')
        ->set('last_name', '#$%')
        ->set('email', 'sharvel.irigoyen@gmail.com')
        ->set('phone', '993994620')
        ->call('save')
        ->assertHasErrors(['last_name'=>'regex:/^[a-zA-Z\s]+$/']);
    }
    public function test_lastname_is_max_60_landing()
    {
        Livewire::test(Landing::class)
        ->set('name', 'javier sharvel')
        ->set('last_name', 'irigoyen matos irigoyen matos irigoyen matos irigoyen matos matos  ')
        ->set('email', 'sharvel.irigoyen@gmail.com')
        ->set('phone', '993994620')
        ->call('save')
        ->assertHasErrors(['last_name'=>'max:60']);
    }
    // test email
    public function test_email_required_landing()
    {
        Livewire::test(Landing::class)
        ->set('name', 'javier sharvel')
        ->set('last_name', 'irigoyen matos')
        ->set('email', '')
        ->set('phone', '993994620')
        ->call('save')
        ->assertHasErrors(['email'=>'required']);
    }
    public function test_email_is_valid_landing()
    {
        Livewire::test(Landing::class)
        ->set('name', 'javier sharvel')
        ->set('last_name', 'irigoyen matos')
        ->set('email', 'sharvel.irigoyen')
        ->set('phone', '993994620')
        ->call('save')
        ->assertHasErrors(['email'=>'email']);
    }

    public function test_email_is_max_60_landing()
    {
        Livewire::test(Landing::class)
        ->set('name', 'javier sharvel')
        ->set('last_name', 'irigoyen matos')
        ->set('email', 'sharvel.irigoyen.sharvel.irigoyen.sharvel.irigoyen.sharvel.irigoyen@gmail.com')
        ->set('phone', '993994620')
        ->call('save')
        ->assertHasErrors(['email'=>'max:60']);
    }
    public function test_email_already_registered_landing()
    {
        Livewire::test(Landing::class)
        ->set('name', 'javier sharvel')
        ->set('last_name', 'irigoyen matos')
        ->set('email', 'sharvel.irigoyen@gmail.com')
        ->set('phone', '993994620')
        ->call('save');
        Livewire::test(Landing::class)
        ->set('name', 'javier sharvel')
        ->set('last_name', 'irigoyen matos')
        ->set('email', 'sharvel.irigoyen@gmail.com')
        ->set('phone', '993994620')
        ->call('save')
        ->assertHasErrors(['email'=>'unique:leads']);
    }
    // test phone
    public function test_phone_required_landing()
    {
        Livewire::test(Landing::class)
        ->set('name', 'javier sharvel')
        ->set('last_name', 'irigoyen matos')
        ->set('email', 'sharvel.irigoyen@gmail.com')
        ->set('phone', '')
        ->call('save')
        ->assertHasErrors(['phone'=>'required']);
    }
    public function test_phone_is_numeric_landing()
    {
        Livewire::test(Landing::class)
        ->set('name', 'javier sharvel')
        ->set('last_name', 'irigoyen matos')
        ->set('email', 'sharvel.irigoyen@gmail.com')
        ->set('phone', 'abc')
        ->call('save')
        ->assertHasErrors(['phone'=>'numeric']);
    }
    public function test_phone_has_min_digits_landing()
    {
        Livewire::test(Landing::class)
        ->set('name', 'javier sharvel')
        ->set('last_name', 'irigoyen matos')
        ->set('email', 'sharvel.irigoyen@gmail.com')
        ->set('phone', '993994')
        ->call('save')
        ->assertHasErrors(['phone'=>'min_digits:9']);
    }
    public function test_phone_has_max_digits_landing()
    {
        Livewire::test(Landing::class)
        ->set('name', 'javier sharvel')
        ->set('last_name', 'irigoyen matos')
        ->set('email', 'sharvel.irigoyen@gmail.com')
        ->set('phone', '9939946201234')
        ->call('save')
        ->assertHasErrors(['phone'=>'max_digits:12']);
    }
}
