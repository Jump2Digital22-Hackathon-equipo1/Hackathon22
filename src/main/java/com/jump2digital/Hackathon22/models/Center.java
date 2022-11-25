package com.jump2digital.Hackathon22.models;

import jakarta.persistence.Entity;
import jakarta.persistence.Id;
import lombok.AllArgsConstructor;
import lombok.Getter;
import lombok.NoArgsConstructor;
import lombok.Setter;
import org.springframework.data.mongodb.core.mapping.Document;

@Document
@Getter
@Setter
@NoArgsConstructor
@AllArgsConstructor
@Entity
public class Center {

    @Id
    private Long centerId;
    private Integer cityCode;
    private Integer regionCode;
    private String centerType;
    private Integer opArea;
}
