import { HttpClient } from "@angular/common/http";
import { Injectable } from "@angular/core";
import { Observable } from "rxjs";


@Injectable({
    providedIn: 'root'
})
export class AuthService {

    constructor(private http: HttpClient) { }


    private token!: string;

    getToken() {
        return this.token;
    }

    authentifier(donnees: { identifiant: string, password: string }): Observable<any> {
        return this.http.post<any>('http://localhost:3000/api-iteams/api.php?demande=login/token-login', donnees);
    }
}
