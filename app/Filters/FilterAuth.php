<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class FilterAuth implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        if ($request->uri->getTotalSegments() >= 2) {
            // Get the controller and method names
            $controller = $request->uri->getSegment(1);
            $method = $request->uri->getSegment(2);
            
            // Check if the current request is for the User controller
            if ($controller == 'User') {
                return; // Skip filter logic for User controller
            }elseif (session()->get('log') != true) {
                return redirect()->to(base_url('Auth'));
            }
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        if ($request->uri->getTotalSegments() >= 2) {
            // Get the controller and method names
            $controller = $request->uri->getSegment(1);
            $method = $request->uri->getSegment(2);
    
            // Check if the current request is for the User controller
            if ($controller == 'User') {
                return; // Skip filter logic for User controller
            }elseif(session()->get('log') == true) {
                # code...
                return redirect()->to(base_url('admin/dashboard'));
            }
        }
    }
}