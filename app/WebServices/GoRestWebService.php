<?php

namespace App\WebServices;

use Illuminate\Http\Request;

class GoRestWebService extends WebService{

    protected $access_token;
    protected $base_url;
    protected $headers;

    public function __construct()
    {
        $this->access_token = "6ff72bfbadfc31f0c09fd3cadab5e678ff9be359a99abd98be29d1e4d780709e";
        $this->base_url = "https://gorest.co.in/public/v2/";
        $this->headers = [
            'Content-Type:application/json',
            'Authorization:Bearer ' . $this->access_token,
            'User-Agent:Mozilla/5.0 (X11; Linux x86_64; rv:60.0) Gecko/20100101 Firefox/60.0'
        ];
        
    }

    //List all users
    public function UserIndex()
    {
        $curl = new Curl();
        return $curl->get($this->base_url.'users', []);
    }

    //Save user 
    public function UserSave(Request $request)
    {
        $post_data = [
            'name' => $request->get("name"),
            'email' => $request->get("email"),
            'gender' => $request->get("gender"),
            'status' => "active"
        ];

        $curl = new Curl(); //Separated class to use on all external api connections
        $post_request = $curl->post($this->base_url . 'users', $post_data, $this->headers);
        if ($post_request->httpcode == 201) {
            return $this->success("Cadastrado!", json_decode($post_request->response));
        }
        return $this->error($post_request->response);
    }

    //save posts
    public function PostSave(Request $request)
    {
        $post_data = [
            'title' => $request->get("title"),
            'body' => $request->get("body"),
        ];

        $curl = new Curl(); 
        $url = $this->base_url."users/".$request->get("gorest_userid")."/posts";
        $post_request = $curl->post($url, $post_data, $this->headers);
        if ($post_request->httpcode == 201) {
            return $this->success("Post Cadastrado!", json_decode($post_request->response));
        }
        return $this->error($post_request->response);
    }

    //save comments
    public function CommentSave(Request $request)
    {
        $post_data = [
            'name' => $request->get("name"),
            'email' => $request->get("email"),
            'body' => $request->get("body"),
        ];

        $curl = new Curl(); 
        $url = $this->base_url."posts/".$request->get("gorest_postid")."/comments";
        $post_request = $curl->post($url, $post_data, $this->headers);
        if ($post_request->httpcode == 201) {
            return $this->success("Comentário Cadastrado!", json_decode($post_request->response));
        }
        return $this->error($post_request->response);
    }

    //delete comments
    public function CommentDelete(int $id)
    {
        $curl = new Curl(); 
        $post_request = $curl->delete($this->base_url."comments/".$id, $this->headers);
        if ($post_request->httpcode == 204) {
            return $this->success("Comentário Deletado!", json_decode($post_request->response));
        }
        return $this->error($post_request->response);
        
    }
}
