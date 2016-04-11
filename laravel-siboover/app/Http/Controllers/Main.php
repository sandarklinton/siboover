<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Main extends Controller {

    public function index() {
        return view('welcome');
    }
    
    public function home() {
        return view('admin.home');
    }
    
    public function booking() {
        return view('admin.booking');
    }
    
    public function profile() {
        return view('admin.profile');
    }
    
    public function history() {
        return view('admin.history');
    }
    
    public function managebooking() {
        return view('admin.managebooking');
    }
    
    public function manageasset() {
        return view('admin.manageasset');
    }
    
    public function manageaccount() {
        return view('admin.manageaccount');
    }
    
    public function managevehicle() {
        return view('admin.managevehicle');
    }
    
    public function addvehicle() {
        return view('admin.addvehicle');
    }
    
    public function vehicledetail() {
        return view('admin.vehicledetail');
    }
    
    public function pickdriver() {
        return view('admin.pickdriver');
    }
    
    public function driverdetail() {
        return view('admin.driverdetail');
    }
    
    public function review() {
        return view('admin.review');
    }
    
    public function profileuser() {
        return view('user.profile');
    }
    
    public function managevehiclef() {
        return view('finance.managevehicle');
    }
    
    public function addmaintenance() {
        return view('finance.addmaintenance');
    }
    
    public function trips() {
        return view('driver.trips');
    }
    
    public function driver() {
        return view('driver.driver');
    }
    
    public function bookinglist() {
        return view('driver.bookinglist');
    }
    
    public function bookingdetails() {
        return view('driver.bookingdetails');
    }
}