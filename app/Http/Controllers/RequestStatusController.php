<?php

namespace App\Http\Controllers;

use App\Models\RequestStatus;
use Illuminate\Http\Request;
use App\Models\Request as ModelRequest;

class RequestStatusController extends Controller
{

    public function index()
    {
        //
    }


    public function create($id)
    {

        $data['title'] = 'Perbarui Status';
        $data['request'] = ModelRequest::with(['inventory','statuses'])->find($id);


        return view('request-status.status-create',$data);
    }

    public function store(Request $request)
    {

    }

    public function show(RequestStatus $requestStatus)
    {
        //
    }

    public function edit(RequestStatus $requestStatus)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $modelRequest = ModelRequest::find($id);

        $requestStatus = new RequestStatus();
        $requestStatus->request_id = $modelRequest->id;
        $requestStatus->status = $request->status;
        $requestStatus->save();

        return redirect()->to('my-inventories/need-actions');
    }

    public function destroy(RequestStatus $requestStatus)
    {
        //
    }
}
