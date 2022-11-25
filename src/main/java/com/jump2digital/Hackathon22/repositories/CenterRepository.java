package com.jump2digital.Hackathon22.repositories;

import com.jump2digital.Hackathon22.models.Center;
import org.springframework.data.mongodb.core.query.Criteria;
import org.springframework.data.mongodb.repository.MongoRepository;
import org.springframework.data.mongodb.repository.Query;

import java.util.List;

public interface CenterRepository extends MongoRepository<Center, Long> {

    List<Center> findByCenterType(String centerType);



}
