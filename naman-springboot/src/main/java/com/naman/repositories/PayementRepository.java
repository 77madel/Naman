package com.naman.repositories;

import com.naman.entities.Payement;
import org.springframework.data.mongodb.repository.MongoRepository;

public interface PayementRepository extends MongoRepository<Payement, String> {}
