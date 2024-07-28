package com.naman.services.Impl;

import com.naman.entities.Payement;
import com.naman.repositories.PayementRepository;
import com.naman.services.PayementService;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

@Service
public class PayementServiceImpl implements PayementService {

    public final PayementRepository payementRepository;

    public PayementServiceImpl(PayementRepository payementRepository) {
        this.payementRepository = payementRepository;
    }

    @Override
    public Payement createPayement(Payement payment) {
        return payementRepository.save(payment);
    }
}
