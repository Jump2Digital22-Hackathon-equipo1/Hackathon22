package com.jump2digital.Hackathon22.models;

import jakarta.persistence.Id;
import jakarta.persistence.JoinColumn;
import jakarta.persistence.ManyToOne;
import lombok.AllArgsConstructor;
import lombok.Getter;
import lombok.NoArgsConstructor;
import lombok.Setter;
import org.springframework.data.mongodb.core.mapping.Document;

import java.math.BigDecimal;

@Document
@Getter
@Setter
@AllArgsConstructor
@NoArgsConstructor
public class Demand {
    @Id
    private String id;
    private int week;
    @ManyToOne
    @JoinColumn(name = "center_id")
    private Center center;
    @ManyToOne
    @JoinColumn(name = "meal_id")
    private Product product;
    private BigDecimal checkoutPrice;
    private BigDecimal basePrice;
    private boolean emailerForPromotion;
    private boolean homepageFeatured;
    private int numOrders;
}
