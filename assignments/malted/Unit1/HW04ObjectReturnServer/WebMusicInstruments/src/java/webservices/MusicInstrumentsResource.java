/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/WebServices/GenericResource.java to edit this template
 */
package webservices;

import javax.ws.rs.core.Context;
import javax.ws.rs.core.UriInfo;
import javax.ws.rs.Consumes;
import javax.ws.rs.Produces;
import javax.ws.rs.GET;
import javax.ws.rs.Path;
import javax.ws.rs.PUT;
import javax.ws.rs.core.MediaType;

/**
 * REST Web Service
 *
 * @author marce
 */
@Path("musicInstruments")
public class MusicInstrumentsResource {

    @Context
    private UriInfo context;

    /**
     * Creates a new instance of MusicInstrumentsResource
     */
    public MusicInstrumentsResource() {
    }

    /**
     * Retrieves representation of an instance of webservices.MusicInstrumentsResource
     * @return an instance of java.lang.String
     */
    @GET
    @Produces(MediaType.TEXT_PLAIN)
    public String getText() {
        String instruments ="{\"name\":\"Bateria\", \"clasification\":\"Percusión\", \"size\":\"Grande\", \"type\":\"Ritmico\", \"approxPrice\": 280},\n" +
        "{\"name\":\"Guitarra\", \"clasification\":\"Cuerda\", \"size\":\"Mediano\", \"type\":\"Armonico\", \"approxPrice\": 50},\n" +
        "{\"name\":\"Piano\", \"clasification\":\"Cuerda percutida\", \"size\":\"Grande\", \"type\":\"Armonico\", \"approxPrice\": 300},\n" +
        "{\"name\":\"Saxofon\", \"clasification\":\"Viento\", \"size\":\"Mediano\", \"type\":\"Melodico\", \"approxPrice\": 480},";
        return instruments;
    }

    /**
     * PUT method for updating or creating an instance of MusicInstrumentsResource
     * @param content representation for the resource
     */
    @PUT
    @Consumes(MediaType.TEXT_PLAIN)
    public void putText(String content) {
    }
}
