package com.jump2digital.Hackathon22;

import com.fasterxml.jackson.core.type.TypeReference;
import com.fasterxml.jackson.databind.ObjectMapper;
import com.jump2digital.Hackathon22.controllers.CenterController;
import com.jump2digital.Hackathon22.models.Center;
import org.apache.commons.csv.CSVFormat;
import org.apache.commons.csv.CSVParser;
import org.apache.commons.csv.CSVRecord;
import org.springframework.boot.CommandLineRunner;
import org.springframework.boot.SpringApplication;
import org.springframework.boot.autoconfigure.SpringBootApplication;
import org.springframework.context.annotation.Bean;
import org.springframework.web.reactive.function.client.WebClient;

import java.io.BufferedReader;
import java.io.IOException;
import java.io.InputStream;
import java.io.InputStreamReader;
import java.util.List;

@SpringBootApplication
public class Hackathon22Application {

	public static void main(String[] args) {
		SpringApplication.run(Hackathon22Application.class, args);
	}

	@Bean
	CommandLineRunner runner(CenterController centerController) {
		return args -> {
			// read json and write to db
			ObjectMapper mapper = new ObjectMapper();
			TypeReference<List<Center>> typeReference = new TypeReference<List<Center>>(){};
			InputStream inputStream = TypeReference.class.getResourceAsStream("/center_info.json");
			try {
				List<Center> centers = mapper.readValue(inputStream,typeReference);
				centerController.saveJson(centers);
			} catch (IOException e){
				System.out.println("Unable to save companies: " + e.getMessage());
			}
		};
	}






}
