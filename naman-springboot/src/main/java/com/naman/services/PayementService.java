package com.naman.services;

import com.naman.entities.Payement;
import com.naman.repositories.PayementRepository;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

public interface PayementService {
    Payement createPayement(Payement payment);
}
