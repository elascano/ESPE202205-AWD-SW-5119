import { Injectable } from "@angular/core";
import { HttpClient } from "@angular/common/http";
import { Observable } from "rxjs";
import { Philosophy } from "../class/philosophy";

@Injectable()
export class phylosophy
{
    constructor(private http:HttpClient){}
    //metodo que obtiene los datos de la api
    getInfo():Observable<Philosophy[]>{
        return this.http.get<Philosophy[]>("http://philosophy-quotes-api.glitch.me/quotes");
    }
}