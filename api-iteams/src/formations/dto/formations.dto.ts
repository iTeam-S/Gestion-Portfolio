import { ApiProperty } from "@nestjs/swagger";

export class FormationsCreateDto {
    @ApiProperty()
    lieu: string;

    @ApiProperty()
    annee: string;

    @ApiProperty()
    type: string;

    @ApiProperty()
    description: string;
}

export class FormationsUpdateDto {
    @ApiProperty()
    id: number;

    @ApiProperty()
    lieu: string;

    @ApiProperty()
    annee: string;

    @ApiProperty()
    type: string;

    @ApiProperty()
    description: string;
}
