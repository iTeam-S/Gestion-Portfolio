import { HttpClient } from "@angular/common/http";
import { Injectable } from "@angular/core";
import { Observable } from "rxjs";
import { adresse } from "src/environments/adresse";


@Injectable({
    providedIn: 'root'
})
export class AuthService {

    constructor(private http: HttpClient) { }

    getToken() {
        return  localStorage.getItem('lahatra-iTeam-$');
    }

    authentifier(donnees: { identifiant: string, password: string }): Observable<any> {
        const data = new FormData();
        data.append('identifiant', donnees.identifiant);
        data.append('password', donnees.password);
        return this.http.post<FormData>(adresse+'/index.php?demande=login/token-login', data);
    }
}
