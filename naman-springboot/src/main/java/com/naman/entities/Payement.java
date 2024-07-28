package com.naman.entities;

import lombok.AllArgsConstructor;
import lombok.Data;
import lombok.NoArgsConstructor;
import org.springframework.data.annotation.Id;
import org.springframework.data.mongodb.core.mapping.Document;

import java.util.Date;

@AllArgsConstructor
@NoArgsConstructor
@Data
@Document(collection = "payement")
public class Payement {

    @Id
    private String id;
    private String type;
    private String status;
    private String montant;
    private Date createdAt;
    private InfoPayement infoPayement;
}