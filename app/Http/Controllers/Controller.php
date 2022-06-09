<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    // 200: OK. The standard success code and default option.
    // 201: Object created. Useful for the store actions.
    // 204: No content. When an action was executed successfully, but there is no content to return.
    // 206: Partial content. Useful when you have to return a paginated list of resources.
    // 400: Bad request. The standard option for requests that fail to pass validation.
    // 401: Unauthorized. The user needs to be authenticated.
    // 403: Forbidden. The user is authenticated, but does not have the permissions to perform an action.
    // 404: Not found. This will be returned automatically by Laravel when the resource is not found.
    // 500: Internal server error. Ideally you're not going to be explicitly returning this, but if something unexpected breaks, this is what your user is going to receive.
    // 503: Service unavailable. Pretty self explanatory, but also another code that is not going to be returned explicitly by the application.

    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function sendResponse($result, $message, $code=200)
    {
    	$response = [
            'success' => true,
            'data'    => $result,
            'message' => $message,
        ];


        return response()->json($response, $code);
    }


    /**
     * return error response.
     *
     * @return \Illuminate\Http\Response
     */
    public function sendError($error, $errorMessages = [], $code = 404)
    {
    	$response = [
            'success' => false,
            'message' => $error,
        ];


        if(!empty($errorMessages)){
            $response['data'] = $errorMessages;
        }


        return response()->json($response, $code);
    }
}
