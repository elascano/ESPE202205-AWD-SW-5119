
package utils;

import com.mongodb.BasicDBObject;
import com.mongodb.DB;
import com.mongodb.DBCollection;
import com.mongodb.MongoClient;
import com.mongodb.MongoClientURI;
import ec.espe.edu.fastsplash.model.Client;

/**
 *
 * @author Christian Novoa
 */
public class DBManager {
    //TODO CRUD
    
    public MongoClient connect() {
        //TODO connect to db
        MongoClient mongo = null;
        try{
            MongoClientURI mongoUri = new MongoClientURI("mongodb://admin:admin@clusteraws-shard-00-00.6k7qv.mongodb.net:27017,clusteraws-shard-00-01.6k7qv.mongodb.net:27017,clusteraws-shard-00-02.6k7qv.mongodb.net:27017/FastSplash?ssl=true&replicaSet=atlas-cgm0yh-shard-0&authSource=admin&retryWrites=true&w=majority");
            mongo = new MongoClient(mongoUri);
        } catch (Exception e) {
            mongo = null;
        }
        return mongo;
    }

    public DBManager() {
    }
}
