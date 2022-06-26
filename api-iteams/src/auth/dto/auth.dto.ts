export class authMembreDto {
    identifiant: string;
    password: string;
}

export class authResponseDto {
    id: number;
    prenom_usuel: string;
    mail: string;
}

export class ResponseTokenDto {
    access_token: string;
}
