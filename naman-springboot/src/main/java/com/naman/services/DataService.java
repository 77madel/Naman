package com.naman.services;

import com.naman.entities.User;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;
import org.springframework.data.mongodb.core.MongoTemplate;

@Service
public class DataService {

    @Autowired
    private MongoTemplate mongoTemplate;

    public void createInitialData() {
        if (!mongoTemplate.collectionExists(User.class)) {
            mongoTemplate.createCollection(User.class);
        }

        User user = new User();
        user.setId("jugumalola");
        user.setPrenom("Kalilou");
        user.setNom("Douyon");
        user.setAge(30);
        user.setContact("21282345678");
        user.setEmail("kalilou.douyon@example.com");
        user.setUsername("jugumalola");
        user.setPassword("password");

        mongoTemplate.save(user);
    }
}