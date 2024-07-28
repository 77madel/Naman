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
@Document(collection = "info_payement")
public class InfoPayement {

    @Id
    private String id;
    private String numTel;
    private String numCarte;
    private String civ;
    private Date dateCarte;
    private String name;
}