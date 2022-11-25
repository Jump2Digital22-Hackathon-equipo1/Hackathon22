package com.jump2digital.Hackathon22.services;

import com.jump2digital.Hackathon22.models.Center;
import com.jump2digital.Hackathon22.models.Demand;
import com.jump2digital.Hackathon22.repositories.CenterRepository;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

import java.util.List;

@Service
public class CenterService {

    @Autowired
    CenterRepository centerRepository;

    public List<Center> getAllCentersData() {
        return centerRepository.findAll();

    }
}
