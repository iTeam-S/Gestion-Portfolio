import { ApiProperty } from "@nestjs/swagger";
export class ProjetsCreateDto {
    @ApiProperty()
    nom: string;

    @ApiProperty()
    description: string;

    @ApiProperty()
    lien: string;

    @ApiProperty()
    pdc: string;

    @ApiProperty()
    ordre: number;
}

export class ProjetsUpdateDto {
    @ApiProperty()
    id: number;

    @ApiProperty()
    nom: string;

    @ApiProperty()
    description: string;

    @ApiProperty()
    lien: string;

    @ApiProperty()
    pdc: string;

    @ApiProperty()
    ordre: number;
}
