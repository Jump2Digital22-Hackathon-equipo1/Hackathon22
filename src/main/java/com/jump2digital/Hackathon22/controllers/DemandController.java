package com.jump2digital.Hackathon22.controllers;

import com.jump2digital.Hackathon22.services.DemandService;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.http.HttpStatus;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.ResponseStatus;
import org.springframework.web.bind.annotation.RestController;

import java.util.List;

@RestController
public class DemandController {

    @Autowired
    DemandService demandService;

    @GetMapping("/get_centers_A")
    @ResponseStatus(HttpStatus.ACCEPTED)
    public List<Object> getAllCentersData() {
        return demandService.getAllCentersData();
    }

}
