<?php

namespace App\Http\Actions;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Domain\ChatSendDomain as Domain;
use App\Http\Responders\ChatSendResponder as Responder;


class ChatSendAction extends Controller
{
    protected $Domain;
    protected $Responder;

    public function __construct(Domain $Domain, Responder $Responder)
    {
        $this->Domain     = $Domain;
        $this->Responder  = $Responder;
    }

    /**
     * @param Request $request
     * @return Response
     */
    public function __invoke(Request $request): Response
    {

        return $this->Responder->response(
            $this->Domain->send()
        );
    }
}
