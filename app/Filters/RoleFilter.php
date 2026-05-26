<?php

namespace App\Filters;

useCodeIgniter\HTTP\RequestInterface;
useCodeIgniter\HTTP\ResponseInterface;
useCodeIgniter\Filters\FilterInterface;

class RoleFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/login')->with('error', 'Please log in to access this page.');
        }
    

    $userRole = session()->get('role');

    if (!in_array($userRole, $arguments)) {
        return redirect() -> to ('/dashboard')->with('error', 'You do not have permission to access this resource.');
    }

    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // do nothing
    }


}

