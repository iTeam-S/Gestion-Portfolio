import { ApiProperty } from "@nestjs/swagger";

export class authMembreDto {
    @ApiProperty()
    identifiant: string;

    @ApiProperty()
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
