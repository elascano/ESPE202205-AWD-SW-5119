import { Injectable } from "@angular/core";
import { HttpClient } from "@angular/common/http";
import { Observable, observable } from "rxjs";
@Injectable()
export class freeApiService{
    constructor(private http:HttpClient){}
    getcomments():Observable<any>{
        return this.http.get("http://localhost:8080/hardwareStore/resource/hardwareStore/");
    }

}