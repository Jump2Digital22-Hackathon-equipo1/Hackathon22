package com.jump2digital.Hackathon22.repositories;

import com.jump2digital.Hackathon22.models.Demand;
import org.springframework.data.mongodb.repository.MongoRepository;

public interface DemandRepository extends MongoRepository<Demand, String> {

}
