package com.jump2digital.Hackathon22.repositories;

import com.jump2digital.Hackathon22.models.Center;
import com.jump2digital.Hackathon22.models.Product;
import org.springframework.data.jpa.repository.JpaRepository;

import java.util.List;

public interface ProductRepository extends JpaRepository<Product,Long> {

    List<Product> findByCategory(String category);

}
