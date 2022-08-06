import { ApiProperty } from "@nestjs/swagger";

export class CompetencesCreateDto {
    @ApiProperty()
    nom: string;

    @ApiProperty()
    liste: string;

    @ApiProperty()
    id_categorie: number;
}

export class CompetencesUpdateDto {
    @ApiProperty()
    id: number;

    @ApiProperty()
    nom: string;

    @ApiProperty()
    liste: string;

    @ApiProperty()
    id_categorie: number;
}
