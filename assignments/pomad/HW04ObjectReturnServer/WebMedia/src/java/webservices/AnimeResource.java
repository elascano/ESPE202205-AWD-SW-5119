/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/WebServices/GenericResource.java to edit this template
 */
package webservices;

import javax.ws.rs.core.Context;
import javax.ws.rs.core.UriInfo;
import javax.ws.rs.Produces;
import javax.ws.rs.Consumes;
import javax.ws.rs.GET;
import javax.ws.rs.Path;
import javax.ws.rs.PUT;
import javax.ws.rs.core.MediaType;

/**
 * REST Web Service
 *
 * @author Fernando
 */
@Path("anime")
public class AnimeResource {

    @Context
    private UriInfo context;

    /**
     * Creates a new instance of AnimeResource
     */
    public AnimeResource() {
    }

    /**
     * Retrieves representation of an instance of webservices.AnimeResource
     * @return an instance of java.lang.String
     */
    @GET
    @Produces(MediaType.TEXT_PLAIN)
    public String getText() {
        String anime = "[{\"name\":\"SPY x Family\",\"gender\":\"Action\",\"author\":\"Tatsuya Endo\",\"editorial\":\"Shueisha\",\"volume\":9}"
                  +",{\"name\":\"Demon Slayer: Kimetsu no Yaiba\",\"gender\":\"Action\",\"author\":\"Koyoharu Gotouge\",\"editorial\":\"Shueisha\",\"volume\":23}"
                  +",{\"name\":\"Kotaro wa hitorigurashi\",\"gender\":\"Drama\",\"author\":\"Mami Tsumura\",\"editorial\":\"Liden Films\",\"volume\":1}"
                  +",{\"name\":\"My Hero Academia\",\"gender\":\"Action\",\"author\":\"Kohei Horikoshi\",\"editorial\":\"Bones\",\"volume\":34}"
                  +",{\"name\":\"Tokyo Ghoul\",\"gender\":\"Terror\",\"author\":\"Sui Ishida\",\"editorial\":\"Shueisha\",\"volume\":14}"
                  +",{\"name\":\"Tokyo Revengers\",\"gender\":\"Action\",\"author\":\"Ken Wakui\",\"editorial\":\"Kodansha\",\"volume\":27}"
                  +",{\"name\":\"Naruto\",\"gender\":\"Action\",\"author\":\"Masashi Kishimoto\",\"editorial\":\"Shueisha\",\"volume\":72}"
                  +",{\"name\":\"Jujutsu Kaisen\",\"gender\":\"Adventure fiction\",\"author\":\"Gege Akutami\",\"editorial\":\"MAPPA\",\"volume\":19}"
                  +"]";

        return anime;   
    }

    /**
     * PUT method for updating or creating an instance of AnimeResource
     * @param content representation for the resource
     */
    @PUT
    @Consumes(MediaType.TEXT_PLAIN)
    public void putText(String content) {
    }
}
