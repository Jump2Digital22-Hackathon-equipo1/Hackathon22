package com.jump2digital.Hackathon22.controllers;

import com.jump2digital.Hackathon22.services.CenterService;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.http.HttpMethod;
import org.springframework.web.bind.annotation.RestController;
import org.springframework.web.reactive.function.client.WebClient;
import org.springframework.web.reactive.function.client.WebClient.*;

@RestController
public class CenterController {

    @Autowired
    CenterService centerService;

    WebClient client = WebClient.create("http://localhost:8080");

    UriSpec<RequestBodySpec> uriSpec = client.method(HttpMethod.GET);

    RequestBodySpec bodySpec = uriSpec.uri("/centers");







}
