<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use DB;

use Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert(array(
            array(
                'fname'=>'Admin',
                'lname'=>'User',
                'email'=>'admin@gmail.com',
                'password'=> Hash::make(123),
                'dob'=>'02/09/1992',
                'gender'=>'Male',
                'income'=>'25000',
                'occupation'=>'Private Job',
                'familytype'=>'Joint family',
                'manglik'=>'Yes',
                'expectedincome'=>'$7500 - $11300',
                'occupation1'=>'Private Job,Government Job,Business',
                'familytype1'=>'Nuclear family',
                'manglik1'=>'Both',
                'usertype' => 'admin'
            ),
            array(
                'fname'=>'Abhisek',
                'lname'=>'Kumar',
                'email'=>'abhisek@gmail.com',
                'password'=> Hash::make(123),
                'dob'=>'02/09/1992',
                'gender'=>'Male',
                'income'=>'22000',
                'occupation'=>'Private Job',
                'familytype'=>'Joint family',
                'manglik'=>'No',
                'expectedincome'=>'$7500 - $21300',
                'occupation1'=>'Private Job,Government Job,Business',
                'familytype1'=>'Joint family,Nuclear family',
                'manglik1'=>'Both',
                'usertype' => 'user'
            ),
            array(
                'fname'=>'Anurag',
                'lname'=>'Kumar',
                'email'=>'akumar@gmail.com',
                'password'=> Hash::make(123),
                'dob'=>'02/09/1990',
                'gender'=>'Male',
                'income'=>'12000',
                'occupation'=>'Private Job',
                'familytype'=>'Joint family',
                'manglik'=>'No',
                'expectedincome'=>'$7500 - $22300',
                'occupation1'=>'Private Job,Government Job,Business',
                'familytype1'=>'Joint family,Nuclear family',
                'manglik1'=>'No',
                'usertype' => 'user'
            ),
            array(
                'fname'=>'Radha',
                'lname'=>'Kumari',
                'email'=>'radha@gmail.com',
                'password'=> Hash::make(123),
                'dob'=>'02/09/1994',
                'gender'=>'Female',
                'income'=>'12000',
                'occupation'=>'Government Job',
                'familytype'=>'Nuclear family',
                'manglik'=>'Yes',
                'expectedincome'=>'$10500 - $24300',
                'occupation1'=>'Private Job,Government Job,Business',
                'familytype1'=>'Joint family,Nuclear family',
                'manglik1'=>'Both',
                'usertype' => 'user'
            ),
            array(
                'fname'=>'Amrita',
                'lname'=>'Kumari',
                'email'=>'amrita@gmail.com',
                'password'=> Hash::make(123),
                'dob'=>'02/09/1993',
                'gender'=>'Female',
                'income'=>'22000',
                'occupation'=>'Business',
                'familytype'=>'Joint family',
                'manglik'=>'Yes',
                'expectedincome'=>'$11500 - $20300',
                'occupation1'=>'Private Job,Government Job,Business',
                'familytype1'=>'Joint family,Nuclear family',
                'manglik1'=>'Both',
                'usertype' => 'user'
            ),
            array(
                'fname'=>'Aman',
                'lname'=>'Kumar',
                'email'=>'aman@gmail.com',
                'password'=> Hash::make(123),
                'dob'=>'02/09/1992',
                'gender'=>'Male',
                'income'=>'22000',
                'occupation'=>'Private Job',
                'familytype'=>'Joint family',
                'manglik'=>'No',
                'expectedincome'=>'$7500 - $21300',
                'occupation1'=>'Private Job,Government Job,Business',
                'familytype1'=>'Joint family,Nuclear family',
                'manglik1'=>'Both',
                'usertype' => 'user'
            ),
            array(
                'fname'=>'Amar',
                'lname'=>'Kumar',
                'email'=>'amar@gmail.com',
                'password'=> Hash::make(123),
                'dob'=>'02/09/1990',
                'gender'=>'Male',
                'income'=>'12000',
                'occupation'=>'Private Job',
                'familytype'=>'Joint family',
                'manglik'=>'No',
                'expectedincome'=>'$7500 - $22300',
                'occupation1'=>'Private Job,Government Job,Business',
                'familytype1'=>'Joint family,Nuclear family',
                'manglik1'=>'No',
                'usertype' => 'user'
            ),
            array(
                'fname'=>'Radhika',
                'lname'=>'Kumari',
                'email'=>'radhika@gmail.com',
                'password'=> Hash::make(123),
                'dob'=>'02/09/1989',
                'gender'=>'Female',
                'income'=>'12000',
                'occupation'=>'Government Job',
                'familytype'=>'Nuclear family',
                'manglik'=>'Yes',
                'expectedincome'=>'$10500 - $24300',
                'occupation1'=>'Private Job,Government Job,Business',
                'familytype1'=>'Joint family,Nuclear family',
                'manglik1'=>'Both',
                'usertype' => 'user'
            ),
            array(
                'fname'=>'Rinki',
                'lname'=>'Kumari',
                'email'=>'rinki@gmail.com',
                'password'=> Hash::make(123),
                'dob'=>'02/09/1991',
                'gender'=>'Female',
                'income'=>'22000',
                'occupation'=>'Business',
                'familytype'=>'Joint family',
                'manglik'=>'No',
                'expectedincome'=>'$11500 - $20300',
                'occupation1'=>'Private Job,Government Job,Business',
                'familytype1'=>'Joint family,Nuclear family',
                'manglik1'=>'Both',
                'usertype' => 'user'
            ),
            array(
                'fname'=>'Aditya',
                'lname'=>'Kumar',
                'email'=>'aditya@gmail.com',
                'password'=> Hash::make(123),
                'dob'=>'02/09/1990',
                'gender'=>'Male',
                'income'=>'12000',
                'occupation'=>'Private Job',
                'familytype'=>'Joint family',
                'manglik'=>'No',
                'expectedincome'=>'$7500 - $22300',
                'occupation1'=>'Private Job,Government Job,Business',
                'familytype1'=>'Joint family,Nuclear family',
                'manglik1'=>'No',
                'usertype' => 'user'
            ),
            array(
                'fname'=>'Riya',
                'lname'=>'Kumari',
                'email'=>'riya@gmail.com',
                'password'=> Hash::make(123),
                'dob'=>'02/09/1989',
                'gender'=>'Female',
                'income'=>'12000',
                'occupation'=>'Government Job',
                'familytype'=>'Nuclear family',
                'manglik'=>'Yes',
                'expectedincome'=>'$10500 - $24300',
                'occupation1'=>'Private Job,Government Job,Business',
                'familytype1'=>'Joint family,Nuclear family',
                'manglik1'=>'Both',
                'usertype' => 'user'
            )
        ));
    }
}
