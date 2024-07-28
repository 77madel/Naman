package com.naman.controllers;

import com.naman.entities.Payement;
import com.naman.services.Impl.PayementServiceImpl;
import com.naman.services.PayementService;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.web.bind.annotation.*;

@RestController
@RequestMapping("/api/payements")
public class PayementController {

    @Autowired
    private PayementService payementService;

    @PostMapping
    public Payement createPayement(@RequestBody Payement payement) {
        return payementService.createPayement(payement);
    }
}
