package com.naman.controllers;

import com.naman.services.DataService;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.RestController;

@RestController
public class DataController {

    @Autowired
    private DataService dataService;

    @GetMapping("/initData")
    public String initData() {
        dataService.createInitialData();
        return "Data initialized";
    }
}