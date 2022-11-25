package com.jump2digital.Hackathon22.controllers;

import com.jump2digital.Hackathon22.models.Center;
import com.jump2digital.Hackathon22.repositories.CenterRepository;
import com.jump2digital.Hackathon22.services.CenterService;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.http.HttpMethod;
import org.springframework.http.HttpStatus;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PathVariable;
import org.springframework.web.bind.annotation.ResponseStatus;
import org.springframework.web.bind.annotation.RestController;
import org.springframework.web.reactive.function.client.WebClient;
import org.springframework.web.reactive.function.client.WebClient.*;

import java.util.List;

@RestController
public class CenterController {

    @Autowired
    CenterRepository centerRepository;

//    WebClient client = WebClient.create("http://localhost:8080");
//
//    UriSpec<RequestBodySpec> uriSpec = client.method(HttpMethod.GET);
//
//    RequestBodySpec bodySpec = uriSpec.uri("/centers");

    @GetMapping("/get-centersByType/{centerType}")
    @ResponseStatus(HttpStatus.ACCEPTED)
    public List<Center> getAllATypeCenters(@PathVariable String centerType){
        return centerRepository.findByCenterType(centerType);
    }
}
