import { ApiProperty } from "@nestjs/swagger";

export class AutresCreateDto {
    @ApiProperty()
    nom: string;

    @ApiProperty()
    lien: string;
}

export class AutresUpdateDto {
    @ApiProperty()
    id: number;

    @ApiProperty()
    nom: string;

    @ApiProperty()
    lien: string;
}
